#!/bin/sh
exec /usr/local/bin/ccls -init='{"clang":{"extraArgs":["-isystem", "/Library/Developer/CommandLineTools/usr/include/c++/v1"]}}' "$@"