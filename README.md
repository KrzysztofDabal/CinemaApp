 O projekcie
Celem projektu jest dostarczenie aplikacji umożliwiającej użytkownikowi na komfortowe przeglądanie, rezerwację i zakup biletu. Wynika to z rosnącego zapotrzebowania na nowoczesne rozwiązania informatyczne w wielu branżach. W branży rozrywkowej jest to szczególnie widoczne w zakresie sprzedaży biletów. Wynika to z faktu że tradycyjna forma zakupu biletu wiąże się często z koniecznością stania w kolejce co bywa uciążliwe. W odpowiedzi na te problemy coraz więcej multipleksów wdraża aplikacje webowe umożliwiające rezerwację i zakup biletu rezygnując z tradycyjnej formy zakupów biletów.
Stworzona aplikacja stanowi odpowiedź na problemy zapewniając wszystkim użytkownikom możliwość komfortowego przeglądania repertuaru multipleksu. Dodatkowo umożliwia ona użytkownikom zalogowanym na wygodną rezerwację i płatności oraz dostęp do swojego profilu. Aplikacja ma również wspierać prace multipleksu dostarczając szereg narzędzi dla użytkowników z odpowiednimi  uprawnieniami umożliwiając im na  zarządzanie repertuarem kina, filmami, salami, cenami i zniżkami poprzez dodawanie, edytowanie lub ich usuwanie.

Narzędzia niezbędne do kompilacji i uruchomienia aplikacji w środowisku lokalnym systemu Windows

• Visual Studio Code, w wersji, zalecane 1.97 - dostępny do pobrania pod adresem:
https://code.visualstudio.com/download

• Composer, w wersji 2.8.5 - dostępny do pobrania pod adresem:
https://getcomposer.org/download/

• XAMPP, w wersji 8.2.12 - dostępny do pobrania pod adresem:
https://www.apachefriends.org/pl/download.html

• PHP, w wersji 8 - dostępny do pobrania pod adresem:
https://windows.php.net/download/

Klucze potrzebne do obsługi dodatkowych funkcjonalności:
 • Logowanie Google - możliwe do wygenerowania identyfikatorów po zalogowaniu:
https://developers.google.com/identity/gsi/web/guides/get-google-api-clientid?hl=pl

Kroki wymagane do kompilacji, testowego uruchomienia oraz konfiguracji aplikacji: 


 1. Z płyty CD zatytułowanej "Krzysztof Dąbal - Aplikacja webowa do rezerwacji i zakupu biletów do multipleksu" skopiować na dysk folder "cinema_projekt"

2. Uruchomienie aplikacji
 a) Uruchomienie programu XAMPP
 • Po uruchomieniu programu należy aktywować moduły klikając przycisk start:

   – Apach
   
   – MySQL
   
 • Uruchomić phpmyadmin klikając przycisk $admin$ przy module MySQL
 
 • Utworzyć nową bazę danych wybierając Database i podając nazwę dla naszej bazy danych, zalecane "laravel"
 
 b) Uruchomienie programu Visual Studio Code
 
 • Po uruchomieniu programu wybieramy opcję otwórz folder, a następnie wybieramy folder "cinema_projekt"
 
 c) Uruchomienie oraz instalacja niezb˛ ednych pakietów/komponentów:
 
 • Należy otworzyć okno terminala wybierając:
 
 Terminal → Nowy terminal
 
 • Skopiować plik .env.example i zmienić jego nazwę na .env
 
Uwaga! jeśli ustawiono inną nazwę bazy danych należy umieścić ją w pliku .env - listing poniżej

         DB_CONNECTION=mysql
         DB_HOST=127.0.0.1
         DB_PORT=3306
         DB_DATABASE=laravel
         DB_USERNAME=root
         DB_PASSWORD=
   
 • Generujemy nowy klucz aplikacji komendą:
 
     php artisan key:generate

• Uruchamiamy migrację bazy danych komendą:

     php artisan migrate
 • Uruchamiamy seedowanie bazy komendą:

     php artisan db:seed
 d) Po zakończonej konfiguracji i instalacji uruchamiamy aplikację komendą:
 
     php artisan serve
 e) Aplikacja uruchomi się pod adresem:
 
     http://127.0.0.1:8000/
W celu otwarcia strony należy otworzyć przeglądarkę i po wpisaniu powyższego adresu otworzy się strona główna aplikacji

 Uwaga!
 
Przed uruchomieniem aplikacji należy wygenerować klucze i identyfikatory i umieścić je w pliku .env - listing poniżej. Pozwoli to na logowanie z konta Google.

     GOOGLE_CLIENT_ID=
     GOOGLE_CLIENT_SECRET=
     GOOGLE_REDIRECT=/auth/google/callback
