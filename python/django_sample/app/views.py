from django.shortcuts import render,redirect
from django.views.generic import View
from .forms import CommentForm,FeedBackForm,WordForm
from .models import Post,Comment,FeedBack,Word,Sentence
from django.contrib.auth.mixins import LoginRequiredMixin
# Create your views here.

class IndexView(View):
    def get(self,request,*args,**kwargs):
        post_data = Post.objects.order_by('-id')
        return render(request,'app/index.html',{
            'post_data': post_data
        })

class FeedBackView(View):
    def get(self,request,*args,**kwargs):
        form = FeedBackForm(request.POST or None)
        return render(request,'app/feedback.html',{
            'form':form
        })
    def post(self,request,*args,**kwargs):
        form = FeedBackForm(request.POST or None)

        if form.is_valid():
            feed_data = FeedBack.objects.order_by('-id')
            feed_data = FeedBack()
            feed_data.author = request.user
            feed_data.title = form.cleaned_data['title']
            feed_data.content = form.cleaned_data['content']
            feed_data.save()
            return redirect('feedbackdone')

        return render(request,'app/add.html',{
            'form':form
            })

class CommentView(View):
    def get(self,request,*args,**kwargs):
        post_data = Comment.objects.order_by('-id')
        return render(request,'app/comment.html',{
            'post_data': post_data
        })

class AddView(View):
    def get(self,request,*args,**kwargs):
        form = CommentForm(request.POST or None)
        return render(request,'app/add.html',{
            'form':form
        })

    def post(self,request,*args,**kwargs):
        form = CommentForm(request.POST or None)

        if form.is_valid():
            com_data = Comment.objects.order_by('-id')
            com_data = Comment()
            com_data.author = request.user
            com_data.title = form.cleaned_data['title']
            com_data.content = form.cleaned_data['content']
            com_data.save()
            return redirect('comment')

        return render(request,'app/add.html',{
            'form':form
        })

class FeedBackDoneView(View):
    def get(self,request,*args,**kwargs):
        return render(request,'app/feeddone.html')

class EventView(View):
    def get(self,request,*args,**kwargs):
        return render(request,'app/event.html')

class TranslationView(View):
    def get(self,request,*args,**kwargs):
        return render(request,'app/translation.html')

class WordView(View):
    def get(self,request,*args,**kwargs):
        form = WordForm(request.POST or None)
        post_data = Word.objects.order_by('-id')

        return render(request,'app/words.html',{
            'form':form,
            'post_data': post_data,
        })

    def post(self,request,*args,**kwargs):
        form = WordForm(request.POST or None)

        if form.is_valid():
            word_data = Word.objects.order_by('-id')
            word_data = Word()
            word_data.before = form.cleaned_data['before']
            from .tools.main import Main
            after = Main.word(form.cleaned_data['before'])
            print(after)
            word_data.after = after
            word_data.save()
            return redirect('words')

        post_data = Word.objects.order_by('-id')
        return render(request,'app/words.html',{
            'form':form,
            'post_data': post_data
        })

class SentenceView(View):
    def get(self,request,*args,**kwargs):
        form = WordForm(request.POST or None)
        post_data = Word.objects.order_by('-id')

        return render(request,'app/words.html',{
            'form':form,
            'post_data': post_data,
        })

    def post(self,request,*args,**kwargs):
        form = WordForm(request.POST or None)

        if form.is_valid():
            word_data = Word.objects.order_by('-id')
            word_data = Word()
            word_data.before = form.cleaned_data['before']
            from .tools.main import Main
            after = Main.word(form.cleaned_data['before'])
            print(after)
            word_data.after = after
            word_data.save()
            return redirect('words')

        post_data = Word.objects.order_by('-id')
        return render(request,'app/words.html',{
            'form':form,
            'post_data': post_data
        })