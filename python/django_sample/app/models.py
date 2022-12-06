from django.db import models
from django.conf import settings
from django.utils import timezone
# Create your models here.

class Post(models.Model):
    title = models.CharField("タイトル",max_length=200)
    content = models.TextField("本文")
    created = models.DateTimeField("作成日",default=timezone.now)

    def __str__(self):
        return self.title

class Comment(models.Model):
    title = models.CharField("タイトル",max_length=200)
    content = models.TextField("本文")
    created = models.DateTimeField("作成日",default=timezone.now)

    def __str__(self):
        return self.title


class FeedBack(models.Model):
    title = models.CharField("タイトル",max_length=200)
    content = models.TextField("内容")
    created = models.DateTimeField("作成日",default=timezone.now)

    def __str__(self):
        return self.title

class Word(models.Model):
    before = models.CharField("日本語",max_length=200)
    after = models.CharField("訳語",max_length=200)

    def __str__(self):
        return self.before

class Sentence(models.Model):
    title = models.CharField("",max_length=200)
    title = models.CharField("",max_length=200)
    def __str__(self):
        return self.title

