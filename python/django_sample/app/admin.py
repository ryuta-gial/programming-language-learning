from django.contrib import admin
from .models import Post,Comment,FeedBack,Word,Sentence
# Register your models here.

admin.site.register(Post)
admin.site.register(Comment)
admin.site.register(FeedBack)
admin.site.register(Word)
admin.site.register(Sentence)
