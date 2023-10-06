# Opencart Container By Modulairy

## Requirements
- The folders DIR_LOGS, DIR_UPLOAD, and DIR_IMAGE should be external volumes for production.
- Environment variables starting with DB_ should be defined.

## Environments

| Environment   | Default Value                         |
|--             |--                                     |
|HTTP_OPENCART  | `${HOSTNAME}/admin/`                  |
|DIR_OPENCART   | `/var/www/html/`                      |
|DIR_IMAGE      | `${DIR_OPENCART}'image/`              |
|DIR_STORAGE    | `/storage`                            |
|DIR_CACHE      | `${DIR_STORAGE}'cache/'`              |
|DIR_DOWNLOAD   | `${DIR_STORAGE}'download/'`           |
|DIR_LOGS       | `DIR_LOGS=${DIR_STORAGE}'logs/'`      |
|DIR_SESSION    | `DIR_SESSION=${DIR_STORAGE}'session/'`|
|DIR_UPLOAD     | `DIR_UPLOAD=${DIR_STORAGE}'upload/'`  |
|DB_DRIVER      |                                       |
|DB_HOSTNAME    |                                       |
|DB_USERNAME    |                                       |
|DB_PASSWORD    |                                       |
|DB_SSL_KEY     |                                       |
|DB_SSL_CERT    |                                       |
|DB_SSL_CA      |                                       |
|DB_DATABASE    |                                       |
|DB_PORT        |                                       |
|DB_PREFIX      | `oc_`                                 |



## References
 - https://docs.opencart.com/
 - https://docs.opencart.com/en-gb/introduction/
 - https://docs.opencart.com/en-gb/developer/module/
 - https://forum.opencart.com/