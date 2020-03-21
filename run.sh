#! /bin/bash

set -eu -o pipefail;
# TODO(might never do this): Ctrl-C not working; workaround - stop container manually

RELEASE=$(curl -s "https://api.github.com/repos/phan/phan/releases/latest" | grep 'tag_name' | cut -d'"' -f4)

# polyfill is not user so not mounting cache dir .phan/ast-cache:/tmp/phan-$USER
# -t to assign tty for colors
docker run -t --rm -v $PWD:/src --name phan-analyze phan-docker:$RELEASE -j $(nproc) --progress-bar --automatic-fix $@
