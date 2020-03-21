#! /bin/bash

set -eu -o pipefail

mkdir -p tmp

if [ ! -d tmp/phan ]; then
    RELEASE=${1:-$(curl -s "https://api.github.com/repos/phan/phan/releases/latest" | grep 'tag_name' | cut -d'"' -f4)}
    git clone -b $RELEASE https://github.com/phan/phan tmp/phan
    cd tmp/phan
    composer install
    cd -
fi

mkdir -p .phan/stubs

extensions=$(cat stublist.txt | tr '\n' ' ')
for ext in $extensions; do
    echo "* Generating stub for $ext"
    tmp/phan/tool/make_stubs -e ${ext} > .phan/stubs/${ext}.phan_php
done
