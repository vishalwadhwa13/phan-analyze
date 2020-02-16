#! /bin/bash

set -eu -o pipefail;
# TODO(might never do this): Ctrl-C not working; workaround - stop container manually

VERSION=2.4.9

# polyfill is not user so not mounting cache dir .phan/ast-cache:/tmp/phan-$USER
# -t to assign tty for colors
docker run -t --rm -v $PWD:/src --name phan-analyze phan-docker:$VERSION -j $(nproc) --progress-bar --automatic-fix $@
