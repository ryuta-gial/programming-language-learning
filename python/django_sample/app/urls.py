from unicodedata import name
from django.urls import path
from app import views

urlpatterns = [
    path('',views.IndexView.as_view(),name='index'),
    path('feedback/',views.FeedBackView.as_view(),name='feedback'),
    path('comment/',views.CommentView.as_view(),name='comment'),
    path('comment/add/',views.AddView.as_view(),name='post_new'),
    path('feedback/done',views.FeedBackDoneView.as_view(),name='feedbackdone'),
    path('event/',views.EventView.as_view(),name='event'),
    path('translation/',views.TranslationView.as_view(),name='translation'),
    path('translation/words/',views.WordView.as_view(),name='words'),
    path('translation/sentence/',views.SentenceView.as_view(),name='sentence'),
]