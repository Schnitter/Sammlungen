Ordner unter Dieser PC entfernen Neue Variante unter Windows 10

Microsoft hat unter Windows 10 eine neue Variante eingebaut, um die Ordner Download, Videos, Dokumente, Musik, Bilder und Desktop die unter Dieser PC angezeigt werden zu entfernen.

Die Methode ist effizienter wie die vorherige, da nach Updates die Ordner nicht wieder erscheinen.
(In der Windows 10 1607 können diese laut einigen Berichten nach Updates trotzdem wieder erscheinen).

Und so geht es:
    Win + R drücken regedit eingeben und starten
        Oder Regedit in die Suche der Taskleiste eingeben und starten
    Nun zum Pfad: 

    HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Microsoft\Windows\CurrentVersion\ Explorer\FolderDescriptions\

   Bilder: {0ddd015d-b06c-45d5-8c4c-f59713854639}\PropertyBag
   Video: {35286a68-3c57-41a1-bbb1-0eae73d76c95}\PropertyBag
   Desktop: {B4BFCC3A-DB2C-424C-B029-7FE99A87C641}\PropertyBag
   Musik: {a0c69a99-21c8-4671-8703-7934162fcf1d}\PropertyBag
   Downloads: {7d83ee9b-2244-4e70-b1f5-5393042af1e4}\PropertyBag
   Dokumente: {f42ee2d3-909f-4907-8871-4c22fc0bf756}\PropertyBag
   3D-Objekte: {31C0DD25-9439-4F12-BF41-7FF4EDA38722}\PropertyBag - Dieser Ordner ist neu in der Windows 10 1709

Wichtig: Auch hier für den Desktop muss im rechten Feld erst:

Rechtsklick / Neue Zeichenfolge mit dem Namen ThisPCPolicy eingegeben werden. Danach doppelt anklicken und den Wert auf Show oder Hide stellen.
