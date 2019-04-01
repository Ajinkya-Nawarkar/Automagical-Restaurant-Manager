#!/bin/bash

cd /home/an839/public_html/SE/link1/Automagical-Restaurant-Manager

git reset --hard HEAD
LOCAL=git rev-parse HEAD
REMOTE=git ls-remote https://github.com/Ajinkya-Nawarkar/DCSP_Project.git HEAD

if ["$LOCAL" != "$REMOTE"]
then
    git checkout order_dev
    git checkout .
    git pull origin order_dev
fi

chmod -R 777 .
permit

