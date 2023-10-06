# Modulairy Opencart Docker Container

![Modulairy](https://modulairy.com/source/logo.jpg)

![Opencart Logo](https://www.opencart.com/application/view/image/icon/opencart-logo.png)

## Table of Contents

- [About the Project](#about-the-project)
- [Features](#features)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Environment Variables](#environment-variables)
  - [Installation](#installation)
- [Using the Opencart Docker Container](#using_the_opencart_docker_container)
- [Extension Installation](#extension_installation)
- [Documentation](#documentation)
- [Feedback and Contributions](#feedback-and-contributions)
- [License](#license)
- [Contact Us](#contact-us)

## About the Project

Our Opencart Docker Container simplifies the deployment of Opencart, a popular open-source e-commerce platform. With this container, you can easily set up and run Opencart in a standardized environment, making it ideal for development, testing, and production use.

## Features

- Quick and straightforward setup
- Preconfigured with Opencart's requirements
- Docker-based for portability and scalability

## Getting Started

Follow these steps to get your Opencart Docker Container up and running:

### Prerequisites

Before you begin, ensure you have met the following requirements:

- Docker: [Installation Guide](https://docs.docker.com/get-docker/)
- Docker Compose (optional): [Installation Guide](https://docs.docker.com/compose/install/)

### Environment Variables

| Variable        | Default Value            | Description                                              |
| --------------- | ------------------------ | -------------------------------------------------------- |
| `DIR_OPENCART`  | `/var/www/html/`         | Directory where Opencart is installed                   |
| `DIR_STORAGE`   | `/storage/`              | Storage directory                                       |
| `DIR_CACHE`     | `${DIR_STORAGE}cache/`   | Cache directory                                         |
| `DIR_DOWNLOAD`  | `${DIR_STORAGE}download/`| Download directory                                      |
| `DIR_LOGS`      | `${DIR_STORAGE}logs/`    | Logs directory                                          |
| `DIR_SESSION`   | `${DIR_STORAGE}session/` | Session directory                                      |
| `DIR_UPLOAD`    | `${DIR_STORAGE}upload/`  | Upload directory                                       |
| `DIR_IMAGE`     | `${DIR_OPENCART}image/`   | Image directory                                         |
| `HTTP_OPENCART` | `${HOSTNAME}/`           | HTTP server URL (if provided)                            |
| `DB_DRIVER`     | -                        | Database driver                                          |
| `DB_HOSTNAME`   | -                        | Database hostname                                        |
| `DB_USERNAME`   | -                        | Database username                                        |
| `DB_PASSWORD`   | -                        | Database password                                        |
| `DB_SSL_KEY`    | -                        | Database SSL key (if provided)                           |
| `DB_SSL_CERT`   | -                        | Database SSL certificate (if provided)                   |
| `DB_SSL_CA`     | -                        | Database SSL CA (if provided)                           |
| `DB_DATABASE`   | -                        | Database name                                           |
| `DB_PORT`       | -                        | Database port                                           |
| `DB_PREFIX`     | `oc_`                    | Database table prefix                                   |

### Installation

1. Clone this repository:

   ```bash
   git clone https://github.com/modulairy/opencart-container.git
   cd opencart-container
   ```
2. Build the Docker container:

   **Args**

    - `DOWNLOAD_URL`: If you want to use a specific Opencart release, provide the download URL as a build argument.
    - `FOLDER`: If you have a specific folder within the Opencart source code, you can specify it as a build argument.


    ```sh
    docker build -t opencart-container .
    ```
4. Running SQL Script on Database:
    To run the SQL script on your database, follow these steps:

    a. Download the SQL script from the following link, replacing `<version>` with the specific version you are using:
    ```
    https://raw.githubusercontent.com/opencart/opencart/<version>/upload/install/opencart.sql
    ```

    b. Use a MySQL client or command-line tool to execute the SQL script against your database. Replace `[DB_USER]`, `[DB_PASSWORD]`, `[DB_HOST]`, `[DB_PORT]`, and `[DB_NAME]` with your database configuration.
    ```bash
    mysql -u [DB_USER] -p[DB_PASSWORD] -h [DB_HOST] -P [DB_PORT] [DB_NAME] < opencart.sql
    ```

5. Using External Persisted Storage (**Recommended for Production**):

    If you plan to use external persisted storage, which is strongly recommended for production environments, follow these steps:

    a. Download the files from the following links and replace `<version>` with the specific version you are using:

    - Images:
        ```
        https://github.com/opencart/opencart/tree/<version>/upload/image
        ```

    - System/Storage:
        ```
        https://github.com/opencart/opencart/tree/<version>/upload/system/storage
        ```

    b. Copy the downloaded files to their respective directories in your external persisted storage. These directories are usually specified in your Opencart configuration.


6. Run the container:
    ```sh
    docker run -d -p 80:80 \
        -e DB_DRIVER=<driver_name> \
        -e DB_HOSTNAME=<hostname> \
        -e DB_USERNAME=<username> \
        -e DB_PASSWORD=<password> \
        -e DB_SSL_KEY=<ssl_key> \
        -e DB_SSL_CERT=<ssl_certificate> \
        -e DB_SSL_CA=<ssl_ca> \
        -e DB_DATABASE=<database_name> \
        -e DB_PORT=<database_port> \
        opencart
    ```
7. Access Opencart in your web browser at `http://localhost.`

For more detailed instructions and customization options, please refer to the Installation Guide.

## Using the Opencart Docker Container

You can easily pull and run the Opencart Docker Container from our Docker Hub repository. This allows you to quickly deploy Opencart without the need to build the Docker image locally.

### Prerequisites

1. Open your terminal or command prompt.

2. Use the following command to pull the Opencart Docker Container from our Docker Hub repository:

   ```bash
   docker pull modulairy/opencart

## Extension Installation

First, Expand the Opencart Docker Container

To begin, you'll need to extend an Opencart Docker Container, and you can do this by using a Dockerfile. Here's a basic example of a Dockerfile to get you started:

```Dockerfile
# Use the official Opencart Docker image
FROM modulairy/opencart

# Download and extract the extension
RUN apt-get update && apt-get install -y unzip && \
    wget -O /tmp/example-extension.zip https://example.com/path-to-your-extension/example-extension.zip && \
    unzip /tmp/example-extension.zip -d /var/www/html/ && \
    rm /tmp/example-extension.zip

# Copy the extension files to the relevant folders
RUN cp -r /var/www/html/upload/* /var/www/html/

# If a script needs to be executed, run it here
# For example:
# RUN chmod +x /var/www/html/install-script.sh && /var/www/html/install-script.sh

# Perform other necessary configurations (e.g., editing configuration files)

# Run the container
CMD ["apache2-foreground"]
```

This Dockerfile includes the necessary steps to extend an Opencart Docker Container and integrate an extension within the Dockerfile itself. Here are the steps explained:

1. The Dockerfile is based on the official Opencart Docker image.
2. The extension is downloaded and extracted.
3. The extension files are copied to the relevant folders.
4. If there's a script that needs to be executed, it can be run in this step.
5. Other required configurations, such as editing configuration files, can be performed.
6. Finally, the container is started with the `CMD ["apache2-foreground"]` command.

You can customize this Dockerfile to fit your specific requirements and manage extensions or other customizations within the Dockerfile.

## Documentation
Explore the [opencart website](https://docs.opencart.com/en-gb/introduction/) for comprehensive guides, tips, and best practices for using the Opencart Docker Container effectively.

## License
This project is licensed under the GNU General Public License, version 3. Please review the license terms before using this software.

Contact Us
If you have any questions, issues, or need assistance, please don't hesitate to reach out to us at opensource@modulairy.com.

Thank you for choosing our Modulairy Opencart Docker Container. We hope it simplifies your e-commerce development and deployment process.
