from django.contrib import admin
from django.urls import path, include

# include('blog_app.urls')     include('アプリ名.ファイル名')
urlpatterns = [
    path('admin/', admin.site.urls),
    path('', include('app.urls')),
    path('accounts/', include('accounts.urls')),
    path('accounts/', include('allauth.urls')),
]
