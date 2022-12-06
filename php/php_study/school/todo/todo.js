$(function() {
  'use strict';
  
$('#new_todo').focus();
  // update
  $('#todos').on('click', '.update_todo', function() {
    // idを取得
    var id = $(this).parents('li').data('id');
    // ajax処理
    $.post('_ajax.php', {
      id: id,
      mode: 'update',
      token: $('#token').val()
    }, function(res) {
      if (res.state === '1') {
        $('#todo_' + id).find('.todo_title').addClass('done');
      } else {
        $('#todo_' + id).find('.todo_title').removeClass('done');
      }
    })
  });

  // delete
  $('#todos').on('click', '.delete_todo', function() {
    // idを取得
    var id = $(this).parents('li').data('id');
    // ajax処理
    if (confirm('are you sure?')) {
      $.post('_ajax.php', {
        id: id,
        mode: 'delete',
        token: $('#token').val()
      }, function() {
        $('#todo_' + id).fadeOut(800);
      });
    }
  });
  
  // create
  $('#new_todo_form').on('submit', function() {
    // titleを取得
    var title = $('#new_todo').val();
    // ajax処理
    $.post('_ajax.php', {
      title: title,
      mode: 'create',
      token: $('#token').val()
    }, function(res) {
      // liを追加
      var $li = $('#todo_template').clone();
      $li
        .attr('id', 'todo_' + res.id)
        .data('id', res.id)
        .find('.todo_title').text(title);
      $('#todos').prepend($li.fadeIn());
      $('#new_todo').val('').focus();
    });
    return false;
  });
});