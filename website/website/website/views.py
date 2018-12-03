from django.http import HttpResponse
from django.shortcuts import render

def homepage_view(request):
    #return HttpResponse('homepage')
    return render(request,'homepage.html')

def products_view(request):
    #return HttpResponse('homepage')
    return render(request,'products.html')

def materials_view(request):
    #return HttpResponse('homepage')
    return render(request,'homepage.html')

def tutorials_view(request):
    #return HttpResponse('homepage')
    return render(request,'homepage.html')
