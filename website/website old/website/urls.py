
from django.conf.urls import url, include
from django.contrib import admin
from . import views
from django.contrib.staticfiles.urls import staticfiles_urlpatterns


urlpatterns = [
    url(r'^admin/', admin.site.urls),
    url(r'^accounts/', include('accounts.urls')),

    url(r'^home/', views.homepage_view,name="home"),
    url(r'^products/', views.products_view,name="products"),
    url(r'^materials/', views.materials_view,name="materials"),
    url(r'^tutorials/', views.tutorials_view,name="tutorials"),
]

urlpatterns += staticfiles_urlpatterns()
