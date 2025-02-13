### Debian: Deutsche Sprache in der Shell einstellen


So kann man auf Debian die Shell auf deutsch ändern

Die Shell in Linux ist ja bekanntlich auf Englisch. Dies kann man aber ganz einfach ändern. Wenn man die Sprache auf Deutsch stellen möchte, braucht man nur ein paar Befehle:
Terminal window

apt-get install locales

Hier installieren wir per Debian-Paketmanager das Paket locales. Sollte selbsterklärend sein. Anschliessend rufen wir das Programm auf:
Terminal window

dpkg-reconfigure locales -plow

Jetzt wählen wir in der Auswahlliste die Deutschen Sprachen aus und bestätigen. Im darauffolgenden Fenster wählen wir nun de_DE als Standardsprache. In den Kommentaren findet Ihr noch einen Hinweis, wie Ihr die Locales pro Benutzer ändert. Nach dem nächsten Login in die Shell ist die Sprache nun auf Deutsch umgestellt. Viel Spaß!
