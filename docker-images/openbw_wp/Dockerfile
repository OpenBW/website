FROM wordpress:4.7.1-apache

RUN rm -R /usr/src/wordpress/wp-content/plugins/akismet
RUN rm /usr/src/wordpress/wp-content/plugins/hello.php
RUN rm /usr/src/wordpress/wp-content/plugins/index.php

# to compile the foundationpress theme via a dedicated docker image, use:
#
# when running for the first time:
# docker run -v $(pwd)/foundationpress:/foundationpress -w /foundationpress -ti node npm install
#
# then:
# docker run -v $(pwd)/foundationpress:/foundationpress -w /foundationpress -ti node npm run build
#
# for subsequent uses only the second command is necessary (since the first did a one-time install of node modules)