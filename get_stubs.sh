#!/bin/bash

set -eu

mkdir -p tmp

if [ ! -d tmp/phpstorm-stubs ]; then
    RELEASE=$(curl -s "https://api.github.com/repos/JetBrains/phpstorm-stubs/releases/latest" | grep 'tag_name' | cut -d'"' -f4)
    git clone -b $RELEASE https://github.com/JetBrains/phpstorm-stubs tmp/phpstorm-stubs
fi

exts=$(ls tmp/phpstorm-stubs | grep -xf stublist.txt)
for ext in $exts; do
    echo "* Getting stub for $ext"
    cp -r tmp/phpstorm-stubs/$ext .phan/stubs/
done
