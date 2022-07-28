#!/bin/bash

# REFERENCES:
# https://stackoverflow.com/questions/13316437/insert-lines-in-a-file-starting-from-a-specific-line

# ONLY FOR DEBUG:
echo -e "utils.sh included."

# Get the project root folder.
# return (string): The name of the project root folder.
get_project_folder() {

    # ONLY FOR DEBUG:
    local THIS_SCRIPT_FILE_WITH_PATH="/var/www/html/php-boilerplate/src/sh/utils.sh"

    # local THIS_SCRIPT_FILE_WITH_PATH=$(readlink -f $0)

    # Path array of the current working directory of this script file.
    local path_array=($(echo "$THIS_SCRIPT_FILE_WITH_PATH" | tr '/' '\n'))

    # Removes the last item of the array (this filename with extension).
    unset path_array[-1]

    # Removes the last item of the array (the directory 'sh').
    unset path_array[-1]

    # Removes the last item of the array (the directory 'src').
    unset path_array[-1]

    # Joins the array back.
    # local project_folder=$(path_array_join "/" "${path_array[@]}")

    local project_folder=${path_array[-1]}

    # Returns the project folder name.
    echo "$project_folder"

}

# Joins array into string.
# param1 (string): The separator for the joining of the array elements.
# param2 (array): The array to be joined.
# return (string): The path.
path_array_join() {

    local separator="$1"
    local array=("$@")
    local path_array

    # Loops through array skipping the first, avoiding /// at the beggining.
    for i in "${array[@]:1}"; do
        path_array="${path_array}${separator}${i}"
    done

    # Return
    echo $path_array
}