#!/bin/sh
set -e

# Remove any left over apache pid file from bad shutdown
rm -f /usr/local/apache2/logs/httpd.pid

exec httpd -DFOREGROUND
