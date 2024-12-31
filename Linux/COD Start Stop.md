`

#! /bin/sh
################################################## #######
# THIS FILE IS FOR STARTING AN Call of Duty 1.2 SERVER #
################################################## #######
# Use at your Own Risk !!!!!!!!!!! #
# You need screen installed on your server #
################################################## #######
# Vars: #
# G_USER Username #
# NAME The Screen Name #
# DESC Server Desciption #
# PARAMS Start Parameter #
# DIR HLDS Directory (absolut) #
# SCRIPT Serverstart Script #
# DAEMON Daemon #
################################################## #######
# OPTIONS: (start|stop|restart|status) #
################################################## #######

################## User ################################
# Username unter dem der Server laufen soll
# NICHT als root laufen lassen
G_USER=games
################## Vars #################################
# Screen NAME
# Attach Screen : # screen -r NAME
# Detach Screen : # [CTRL]+[A]; [D]
# Don't press [CTRL]+[C] it will terminate screen
NAME=cod
################## Server Description ###################
# Single Word DESC=myserver
# Multiple Words DESC="This is my Server"
DESC="Call of Duty 1.2"
################## Parameter ############################
# CAN USE: +servercfgfile server.cfg OR +exec server.cfg
PARAMS="+set dedicated 1 +map_rotate"
################## Directory ############################
# Your Path to cod Directory (absolute)
DIR=/usr/games/cod
################## DAEMON ##############################
# You place your startscript here, normally hlds_run
SCRIPT=cod_lnxded
################################################## ######
#### DONT CHANGE ANYTHINK BELOW THIS LINE ! ! ! ####
################################################## ######

DAEMON=$DIR/$SCRIPT

case "$1" in
start)
if [[ `su $G_USER -c "screen -ls | grep $NAME"` ]]
then
echo "CoD is already running!"
else
echo "Starting $DESC: $NAME"
su $G_USER -c "cd $DIR; screen -d -m -S $NAME $DAEMON $PARAMS"
fi
;;

stop)
if [[ `su $G_USER -c "screen -ls | grep $NAME"` ]]
then
echo -n "Stopping $DESC: $NAME "
kill `ps aux | grep -i screen | grep -i $NAME | awk '{print $2}'`
echo " ... done."
else
echo "Coulnd't find a running $DESC"
fi
;;

restart)
if [[ `su $G_USER -c "screen -ls | grep $NAME"` ]]
then
echo -n "Stopping $DESC: $NAME "
kill `ps aux | grep -i screen | grep -i $NAME | awk '{print $2}'`
echo " ... done."
else
echo "Coulnd't find a running $DESC"
fi

echo -n "Starting $DESC: $NAME"
su $G_USER -c "cd $DIR; screen -d -m -S $NAME $DAEMON $PARAMS"
echo " ... done."
;;

status)
ps aux | grep -v grep | grep cod > /dev/null
CHECK=$?
[ $CHECK -eq 0 ] && echo "CoD is UP" || echo "CoD is DOWN"
;;
*)

echo "Usage: $0 {start|stop|restart|status}"
exit 1
;;
esac

exit 0

`
