#!/bin/bash

DOCKER_BUILDKIT=1 docker build -t spec:latest -f .docker/Dockerfile .