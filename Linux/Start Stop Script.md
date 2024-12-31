Hi,

Hier mal was schönes wonach auch viele suchen...

Ein Start/restart/stop script das per shell ausgeführt wird und sogar für so ziemlich fast jeder spiel tauglich ist und auch für beliebig viele server des gleichen oder anderen games also gemischt... :S

hier der code den ihr in eine leere datei einfügt (ohne endung) wie z.b. "server"


`
#! /bin/sh
################################################## #######
# THIS FILE IS FOR STARTING AN COUNTERSTRIKE 1.6 SERVER #
################################################## #######
# GriZZly@CS-Gemeinde.de #
################################################## #######
# Use at your Own Risk !!!!!!!!!!! #
# You need screen installed on your server #
################################################## #######
# Vars: #
# NAME The Screen Name #
# DESC Server Desciption #
# PARAMS HLDS Start Parameter #
# DIR HLDS Directory (absolut) #
# SCRIPT Your HLDS Script #
# DAEMON Your Daemon #
################################################## #######
# OPTIONS: (start|stop|restart) #
################################################## #######

################## Vars #################################
# Screen NAME
# Attach Screen : # screen -r NAME
# Detach Screen : # [CTRL]+[A]; [D]
# Don't press [CTRL]+[C] it will terminate screen
NAME=web8

################## Server Description ###################
# Single Word DESC=myserver
# Multiple Words DESC="This is my Server"
DESC="www.shell4u.de"

################## Parameter ############################
# CAN USE: +servercfgfile server.cfg OR +exec server.cfg
PARAMS="-game cstrike +maxplayers 4 -port 27065 +map de_dust -autoupdate
################## Directory ############################
# Your Path to hlds_l Directory (absolute)
DIR=/home/web8/hlds_l

################## DAEMON ##############################
# You place your startscript here, normally hlds_run
SCRIPT=hlds_run

################################################## ######
#### DONT CHANGE ANYTHINK BELOW THIS LINE ! ! ! ####
################################################## ######

DAEMON=$DIR/$SCRIPT

case "$1" in
start)
echo "Starting $DESC: $NAME"
cd $DIR
screen -d -m -S $NAME $DAEMON $PARAMS
;;

stop)
if [[ `screen -ls | grep $NAME` ]]
then
echo -n "Stopping $DESC: $NAME"
kill `ps aux | grep SCREEN | grep $NAME | cut -d" " -f 6 | awk -F . '{print $1}'|awk '{print $1}'`
echo " ... done."
else
echo "Coulnd't find a running $DESC"
fi
;;

restart)
if [[ `screen -ls | grep $NAME` ]]
then
echo -n "Stopping $DESC: $NAME"
kill `ps aux | grep SCREEN | grep $NAME | cut -d" " -f 6 | awk -F . '{print $1}'| awk '{print $1}'`
echo " ... done."
else
echo "Coulnd't find a running $DESC"
fi

echo -n "Starting $DESC: $NAME"
cd $DIR
screen -d -m -S $NAME $DAEMON $PARAMS
echo " ... done."
;;

*)
echo "Usage: $0 {start|stop|restart}"
exit 1
;;
esac

exit 0

##### EOF #####
`

per ./server start / stop / restart führt man das gewünschte aus!

die rechte sollten auf 500 (nur der besitzer darf sie lesen und auführen jedoch nicht schreiben/bearbeiten) gesetzt werden (chmod 500 server), da sonst wenn das script in einem verzeichnis das einem kunden oder mitbenutzer gehört die slot anzahl geändert werden kann! was nicht im sinne des gameserver anbieters liegt (btw kenne ich kaum einen der ssh anbietet aber naja ... werbung will ich hier auch nicht machen wer so einen wissen will soll mich pm).
wenn man alleiniger auf dem server ist kann man es auf 700 setzen oder wenn gewollt 777

um es anzupassen sollte man den deamon anpassen also z.b. für enemy territory


``
################## DAEMON ##############################
# You place your startscript here, normally hlds_run
SCRIPT=etded
`

und nicht zu vergessen den pfad anpassen! ebenso NAME DESC und PARAM (die startparameter!)


PS: fragen dazu bitte an mich richten und nicht an GriZZly@CS-Gemeinde.de da er nicht mehr daran arbeitet (glaub ich ^^) - kam zumindest keine antwort von ihm bezüglich des scripts!?