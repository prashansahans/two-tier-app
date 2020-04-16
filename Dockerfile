FROM registry.redhat.io/ubi8/ubi:8.0-122
MAINTAINER laurent.broudoux@gmail.com
RUN curl -L https://github.com/stedolan/jq/releases/download/jq-1.6/jq-linux64 -o jq \
  && chmod +x ./jq && cp jq /usr/bin
