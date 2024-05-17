#!/bin/bash

# Define your password
PASSWORD="password@123"

# Check if password is provided as an argument
if [[ "$@" == *"$PASSWORD"* ]]; then
    # If password is found, allow wget to execute with provided arguments
    /usr/bin/wget "$@"
else
    # If password is not found, print an error message
    echo "Permission denied. Please provide the correct password."
fi
