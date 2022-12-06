from django import forms

class PostForm(forms.Form):
    title = forms.CharField(max_length=30,label='タイトル')
    content = forms.CharField(label='内容',widget=forms.Textarea())

class CommentForm(forms.Form):
    title = forms.CharField(max_length=30,label='タイトル')
    content = forms.CharField(label='内容',widget=forms.Textarea())


class FeedBackForm(forms.Form):
    title = forms.CharField(max_length=30,label='タイトル')
    content = forms.CharField(label='内容',widget=forms.Textarea())

class WordForm(forms.Form):
    before = forms.CharField(max_length=30,label='日本語')
    
class SentenceForm(forms.Form):
    title = forms.CharField(max_length=30,label='タイトル')
    content = forms.CharField(label='内容',widget=forms.Textarea())