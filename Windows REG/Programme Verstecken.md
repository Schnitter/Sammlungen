In diesem Tutorial zeige ich euch wie ihr unter Windows 10 und Windows 11 installierte Programme (unter Apps & Features) verstecken könnt. Sodass diese nicht mehr dort aufgelistet werden. 
Hierzu ist lediglich ein kleiner Eingriff in die Windows Registry (Registrierungsdatenbank ) mit "regedit.exe" nötig.




► Die Registry-Keys unter denen ihr die Uninstall-Informationen findet
`HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows\CurrentVersion\Uninstall`

`HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Microsoft\Windows\CurrentVersion\Uninstall`

`HKEY_CURRENT_USER\Software\Microsoft\Windows\CurrentVersion\Uninstall`

► Eintrag verstecken
`Neu`,  `DWORD-Wert (32-bit)`, Name: "SystemComponent" mit dem Wert 1 erstellen.
