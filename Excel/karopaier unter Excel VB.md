
Excel-Tabelle per VBA-Makro als kariertes Kästchenpapier anlegen
Legen Sie eine neue Tabelle per Makro an, in der alle Zellen als kleine Karos formatiert werden und damit Kästchenpapier ergeben


Kästchenpapier ist praktisch. Sie können es nicht nur bei mathematischen Berechnungen verwenden, sondern auch für andere Aufgaben einsetzen.

Aufgrund der Zellenstruktur ist eine Excel-Tabelle grundsätzlich geeignet, um die Optik von Kästchenpapier anzunehmen.

Die entsprechenden Formatierungen können Sie manuell vornehmen. Einfacher geht es per Makro. Das folgende VBA-Makro legt eine neue Arbeitsmappe an und formatiert das erste Tabellenblatt in dieser Arbeitsmappe mit kleinen Karos:

```
Sub ErzeugeKariertesPapier()
Dim Ecke As Integer
With Workbooks.Add.Worksheets(1).Cells
 .RowHeight = 12
 .ColumnWidth = 1.5
 For Ecke = 7 To 12
  With .Borders(Ecke)
   .Weight = xlHairline
   .ColorIndex = xlAutomatic
   .LineStyle = xlContinuous
  End With
 Next Ecke
End With
End Sub
```

Die folgende Abbildung zeigt wie die passende Excel-Tabelle aussieht. Sie entspricht optisch einer Seite mit Kästchen, wie sie im Mathematikunterricht verwendet wird.

Kästchenpapier in einer Excel-Tabelle

Um das Makro einzugeben, drücken Sie in Excel die Tastenkombination ALT F11, um den VBA-Editor aufzurufen. Wählen Sie im VBA-Editor das Kommando EINFÜGEN - MODUL und geben Sie das Makro ein. Um das Makro zu starten, aktivieren Sie in Excel die Tastenkombination ALT F8. Die beiden Tastenkombinationen funktionieren in allen Excel-Versionen. 
