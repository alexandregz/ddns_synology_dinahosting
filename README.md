# ddns_synology_dinahosting
add domains registered with dinahosting to Synology's DDNS

* Add dinahosting to /etc.defaults/ddns_provider.conf
```bash
root@voyager:/etc.defaults# fgrep dinahosting ddns_provider.conf
[dinahosting]
        modulepath=/usr/syno/bin/ddns/dinahosting.php
        queryurl=https://dinahosting.com
```

* Put dinahosting.php into /usr/syno/bin/ddns
