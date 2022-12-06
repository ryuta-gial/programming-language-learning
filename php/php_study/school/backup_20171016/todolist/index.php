<?php

require_once('config.php');
require_once('functions.php');

// DBに接続

$dbh = connectDb();

$tasks = array();

$sql = "select * from tasks where type != 'deleted' order by seq";
foreach ($dbh->query($sql) as $row) {
    array_push($tasks, $row);
}

// var_dump($tasks);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>TODOリスト</title>
    <link type="text/css" href="jquery.datetimepicker.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
    <script type="text/javascript" src="jquery.datetimepicker.js"></script>
    <style>
    .deleteTask, .drag, .editTask {
        cursor: pointer;
        color: blue;
    }
    .done {
        text-decoration: line-through;
        color: gray;
    }
    </style>
</head>
<body>
<h1>成果物TODOリスト</h1>
<p>
    <input type="text" size="30" id="title" placeholder="タスク名を入力してください"><br/>
    <input type="text_" size="50" id="point" placeholder="タスクが完了するポイントを入力してください"><br/>
     <input type="text" size="30" class="datetimepicker" id="limit" placeholder="期限を入力してください"> <br/>
    <input type="button" id="addTask" value="追加">
</p>
<ul id="tasks">
<?php foreach ($tasks as $task) : ?>
<li id="task_<?php echo h($task['id']); ?>" data-id="<?php echo h($task['id']); ?>">
    <input type="checkbox" class="checkTask" <?php if ($task['type']=="done") { echo "checked"; } ?>>
    <span class="<?php echo h($task['type']); ?>"><?php echo h($task['title']); ?></span>
    <span class="<?php echo h($task['type']); ?>"><?php echo "※".h($task['point']); ?></span>
    <span class="<?php echo h($task['type']); ?>"><?php echo h($task['limit_day']); ?></span> 
    <span <?php if ($task['type']=="notyet") { echo 'class="editTask"'; } ?>>[編集]</span>
    <span class="deleteTask">[削除]</span>
    <span class="drag">[drag]</span>
</li>
<?php endforeach; ?>
</ul>
<script>
$('.datetimepicker').datetimepicker({
        timepicker: false,
        format : 'Y/m/d '
    });

</script>
<script>
$(function() {
    $('#title').focus();
    
    $('#addTask').click(function() {
        var title = $('#title').val();
        var point = $('#point').val();
        var limit = $('#limit').val();
        $.post('_ajax_add_task.php', {
            title: title,
            point: point,
            limit: limit
        }, function(rs) {
            var e = $(
                '<li id="task_'+rs+'" data-id="'+rs+'">' + 
                '<input type="checkbox" class="checkTask"> ' + 
                '<span></span> ' +
                '※ ' +
                 '<span></span> ' +
                  '<span></span> ' + 
                '<span class="editTask">[編集]</span> ' + 
                '<span class="deleteTask">[削除]</span> ' + 
                '<span class="drag">[drag]</span>' + 
                '</li>'
            );
            $('#tasks').append(e).find('li:last span:eq(0)').text(title);
            $('#tasks').append(e).find('li:last span:eq(1)').text(point);
            $('#tasks').append(e).find('li:last span:eq(2)').text(limit);
            $('#title').val('').focus();
        });    
    });

    $(document).on('click', '.editTask', function() {
        var id = $(this).parent().data('id');
        var title = $(this).prev().prev().prev().text();
        var point = $(this).prev().prev().text();
        var limit = $(this).prev().text();
        
        $('#task_'+id)
            .empty()
            .append($('<input type="text">').attr('value',title))
            .append($('<input type="text">').attr('value',point))
            .append($('<input type="text" class="datetimepicker">').attr('value',limit))
            .append('<input type="button" value="更新" class="updateTask">');
        $('#task_'+id+' input:eq(0)').focus();
    });
    
    $(document).on('click', '.updateTask', function() {
        var id = $(this).parent().data('id');
        var title = $(this).prev().prev().prev().val();
        var point = $(this).prev().prev().val();
        var limit = $(this).prev().val();
        $.post('_ajax_update_task.php', {
            id: id,
            title: title,
            point: point,
            limit: limit
        }, function(rs) {
            var e = $(
                '<input type="checkbox" class="checkTask"> ' + 
                '<span></span> ' + 
                 '※ ' +
                '<span></span>' + 
                '<span></span> ' + 
                '<span class="editTask">[編集]</span> ' + 
                '<span class="deleteTask">[削除]</span> ' + 
                '<span class="drag">[drag]</span>'
            );
            $('#task_'+id).empty().append(e).find('span:eq(0)').text(title);
            $('#task_'+id).append(e).find('span:eq(1)').text(point);
            $('#task_'+id).append(e).find('span:eq(2)').text(limit);
        });
    });

    $('#tasks').sortable({
        axis: 'y',
        opacity: 0.2,
        handle: '.drag',
        update: function() {
            $.post('_ajax_sort_task.php', {
                task: $(this).sortable('serialize')
            });
        }
    });

    $(document).on('click', '.checkTask', function() {
        var id = $(this).parent().data('id');
        var title = $(this).next();
        var point = $(this).next().next();
        var limit = $(this).next().next().next();
        $.post('_ajax_check_task.php', {
            id: id
        }, function(rs) {
            if (title.hasClass('done')) {
                title.removeClass('done').next();
                point.removeClass('done').next().next().addClass('editTask');
                 limit.removeClass('done').next().next().next().addClass('editTask'); 
            } else {
                title.addClass('done').next().removeClass('editTask');
                point.addClass('done').next().removeClass('editTask');
                limit.addClass('done').next().removeClass('editTask');
            }
        });
    });

    $(document).on('click', '.deleteTask', function() {
        if (confirm('本当に削除しますか？')) {
            //IDを持ってきて渡すajax
            var id = $(this).parent().data('id');
            $.post('_ajax_delete_task.php', {
                id: id
            }, function(rs) {
                $('#task_'+id).fadeOut(800);
            });
        }
    });

});
</script>
</body>
</html>