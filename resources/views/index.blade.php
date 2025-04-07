@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #6dd5ed, #c471ed);
    }

    .linkedin-navbar {
        background-color: #1e1e1e;
        padding: 8px 20px;
        border-bottom: 1px solid #333;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 999;
    }

    .logo {
        font-weight: bold;
        font-size: 20px;
        color: #ffffff; /* Tornando visível no fundo escuro */
        margin-right: 20px;
    }

    .linkedin-search {
        background-color: #333;
        border: none;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        width: 250px;
    }

    .linkedin-menu-icons a {
        color: #ccc;
        text-decoration: none;
        margin-left: 25px;
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 12px;
        transition: color 0.2s;
    }

    .linkedin-menu-icons a:hover {
        color: #fff;
    }

    .linkedin-menu-icons i {
        font-size: 18px;
        margin-bottom: 3px;
    }

    .user-avatar {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        margin-bottom: 2px;
    }

    .linkedin-body {
        margin-top: 75px;
        padding: 20px;
    }

    .left-sidebar,
    .right-sidebar {
        background-color: #1e1e1e;
        padding: 20px;
        border-radius: 10px;
        border: 1px solid #333;
    }

    .feed {
        margin: 0 20px;
    }

    .post-card {
        background-color: #1e1e1e;
        border: 1px solid #333;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .post-header {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .post-header img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .footer {
        text-align: center;
        font-size: 14px;
        margin-top: 30px;
        color: #888;
    }

    .dropdown-menu {
        background-color: #2c2c2c;
    }

    .dropdown-menu a {
        color: #fff;
    }

    .dropdown-menu a:hover {
        background-color: #444;
    }
</style>

{{-- Navbar estilo LinkedIn escuro --}}
<nav class="linkedin-navbar">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center flex-grow-1 justify-content-center">
            <div class="logo me-3">MyLinkedIn</div>
            <input type="text" class="linkedin-search" placeholder="Pesquisar">
        </div>

        <div class="linkedin-menu-icons d-flex align-items-center">
            <a href="#"><i class="fas fa-home"></i><span>Home</span></a>
            <a href="#"><i class="fas fa-users"></i><span>Minha Rede</span></a>
            <a href="#"><i class="fas fa-briefcase"></i><span>Vagas</span></a>
            <a href="#"><i class="fas fa-comment-dots"></i><span>Mensagens</span></a>
            <a href="#"><i class="fas fa-bell"></i><span>Notificações</span></a>

            @guest
                @if (Route::has('login'))
                    <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i><span>Login</span></a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i><span>Registrar</span></a>
                @endif
            @else
                <div class="dropdown ms-3">
                    <a class="dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="user-avatar rounded-circle"
                            src="{{ Auth::user()->arquivo ? asset('storage/' . Auth::user()->arquivo->caminho) : 'https://via.placeholder.com/24' }}"
                            alt="avatar"
                            width="24" height="24">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            @endguest
        </div>
    </div>
</nav>

<div class="container-fluid linkedin-body">
    <div class="row">
        <div class="col-md-3 left-sidebar">
            <h6 class="text-white">Menu</h6>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-light" href="#">Perfil</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="#">Amigos</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="#">Notificações</a></li>
            </ul>
        </div>

        <div class="col-md-6 feed">
            <div class="post-card">
                <div class="post-header">
                    <img src="https://via.placeholder.com/40" alt="avatar">
                    <div class="text-white">
                        <strong>João da Silva</strong><br>
                        <small>há 1 hora</small>
                    </div>
                </div>
                <p class="text-white">Este é um post com layout similar ao do LinkedIn. Clean, moderno e funcional.</p>
            </div>

            <div class="post-card">
                <div class="post-header">
                    <img src="https://via.placeholder.com/40" alt="avatar">
                    <div class="text-white">
                        <strong>Maria Oliveira</strong><br>
                        <small>há 2 horas</small>
                    </div>
                </div>
                <p class="text-white">Mais um post de exemplo para simular o feed de publicações.</p>
            </div>
        </div>

        <div class="col-md-3 right-sidebar">
            <h6 class="text-white">Sugestões para você</h6>
            <p class="text-white">Lucas Mendes</p>
            <p class="text-white">Ana Costa</p>
            <p class="text-white">Pedro Souza</p>
        </div>
    </div>
</div>

<div class="footer">
    &copy; {{ date('Y') }} MyLinked — Inspirado no LinkedIn.
</div>
@endsection
