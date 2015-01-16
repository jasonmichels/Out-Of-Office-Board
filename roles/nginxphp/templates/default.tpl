server {
    listen 80;
    root {{ doc_root }};
    index index.html index.php;

    server_name {{ server_name }};

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param APPLICATION_ENV {{ application_env }};
        include fastcgi_params;
    }

    # We don't need .ht files with nginx.
    location ~ /\.ht {
        deny all;
    }
}