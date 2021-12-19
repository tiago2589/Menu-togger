<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>@yield('title') </title> 
        
        
        <!--Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400&family=Work+Sans:wght@300&display=swap" rel="stylesheet">
        <!--CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!--CSS da aplicação! -->
        <link rel="stylesheet" href="/css/styles.css">
        <!-- INCONES DO SITE Ionicons AULA 09-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="/js/scripts.js"></script>
    </head>
        <body>
            <!-- Fazendo o MENU -->
            <header class="cabecalho">
                <!-- IMAGEM ICONE -->
                <div class="logo">
                    <a href="/">
                        <img src="/img/icon2.png" alt="logo">
                    </a>
                </div>
                <!-- BOTAO TOGGER MOBILE -->
                <button class="menu-togger">
                <ion-icon name="menu-outline"></ion-icon>
                </button>
                <nav class="menu">
                      <!-- LISTA DOS ITENS DO MENU -->
                      <ul>
                          <li><a href="/">Início</a></li>
                          @guest
                          <li><a href="/dashboard">Meu Eventos</a></li>
                          @endguest
                          @auth<!-- Diretira do laravel onde o usuário só tem acesso se estiver está autenticado/registrado/logado -->
                          <li><a href="/events/create">Criar Eventos</a></li>
                          <li><a href="/dashboard">Meu Eventos</a></li>
                          <li>
                              <form action="/logout" method="POST">
                              @csrf   <!-- Diretiva de proteção do laravel de proteção.. --> 
                              <a href="/logout"
                              onclick="event.preventDefault();this.closest('form').submit();"> Sair</a><!-- Javascript event -->
                            </form>
                          </li>
                        @endauth
                        </ul>
                    </nav>
                <aside class="autenticacao"><!-- aside = a parte, de lado, como se fosse uma div de lado -->
                    @guest <!-- guest = hospede Diretira do laravel onde o usuário está logado, dai alguns itens do menu sai da tela AULA22-->
                    <a href="/login">Login</a>
                    <a href="/register" class="botao destaque">Registrar</a>
                    @endguest
                </aside>
            </header>
           <!-- SCRIPT para fixar o quadrado do hover quando estiver selecionado 
            <script>
                window.onhashchange = function(e){
                    const oldURL = e.oldURL.split('#')[1]
                    const newURL = e.newURL.split('#')[1]
                    console.log(oldURL, newURL)
                    const oldLINK = document.quarySelector(`.menu a[href='#${oldURL}']`)
                    const newLINK = document.quarySelector(`.menu a[href='#${newURL}']`)
                    oldLink && oldLink.classList.remove('selected')
                    newLink && newLink.classList.add('selected')
                }
            </script> -->
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                    <p class="msg"> {{ session('msg') }} </p>
                    @endif
                </div>
            </div>
        </main>
        <!-- RODAPE -->
        @yield('content')<!-- EXTENDE PARA OUTRA PAGINA -->
        <footer>
            <p>GOLMONEY BOT &copy;2021</p>
        </footer>
    </body>
</html>