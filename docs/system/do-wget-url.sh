#!/bin/sh

BASE_URL=http://YOUR_OPENCACHING_HOSTNAME/
OUTPUT_DIR=/path/to/conjobs_output/
WGET_CMD=/usr/bin/wget

if [ -z "$1" ]; then echo "Missing command argument!"; exit 1; fi
if [ -z "$2" ]; then echo "Missing output argument!"; exit 1; fi

${WGET_CMD} -q ${BASE_URL}/$1 -O ${OUTPUT_DIR}/$2

# Check if there was output (usually errors).
# Output these to stdout so cron generates a notification email
if [ -f "${OUTPUT_DIR}/$2" -a -s "${OUTPUT_DIR}/$2" ]; then
    cat ${OUTPUT_DIR}/$2
fi
