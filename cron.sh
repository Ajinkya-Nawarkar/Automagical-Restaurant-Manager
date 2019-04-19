#!/bin/bash

cd /home/an839/public_html/SE/cern/Automagical-Restaurant-Manager

git reset --hard HEAD
LOCAL=git rev-parse HEAD
REMOTE=git ls-remote https://github.com/Ajinkya-Nawarkar/Automagical-Restaurant-Manager.git HEAD

if ["$LOCAL" != "$REMOTE"]
then
    git checkout frontpage_dev
    git checkout .
    git pull origin frontpage_dev
fi

chmod -R 777 .
permit

