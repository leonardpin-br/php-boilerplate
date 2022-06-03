#!/bin/bash

# REFERENCES:
# https://github.com/VitexSoftware/phpunit-skeleton-generator
# https://stackoverflow.com/questions/8880603/loop-through-an-array-of-strings-in-bash
# https://askubuntu.com/questions/674333/how-to-pass-an-array-as-function-argument
# https://stackoverflow.com/questions/57585770/bash-for-loop-skip-first-element-of-array
# https://unix.stackexchange.com/questions/180613/bash-find-get-directory-of-found-file
# https://stackoverflow.com/questions/3915040/how-to-obtain-the-absolute-path-of-a-file-via-shell-bash-zsh-sh
# https://stackoverflow.com/questions/13210880/replace-one-substring-for-another-string-in-shell-script
# https://stackoverflow.com/questions/793858/how-to-mkdir-only-if-a-directory-does-not-already-exist


include() {
    # MY_DIR corresponde ao diretório do arquivo principal.
    MY_DIR=$(dirname $(readlink -f $0))
    . $MY_DIR/$1
}

# Included files
include "utils.sh"

# param1 (string): The filename with extension.
get_file_relative_folder() {
    local file_relative_folder=$(find . -name "$1" -printf '%h\n')
    echo "$file_relative_folder"
}

# param1 (string): Full file path of the opened file.
# return (string): The complete namespace as it exists in the opened (class) file.
get_file_namespace() {
    # Find the namespace inside the opened file.
    local line_containing_namespace=$(grep -w '^namespace' "$1") # namespace PHP_Boilerplate\classes\subfolder;
    local complete_namespace=${line_containing_namespace/namespace /}
    complete_namespace=$(echo "${complete_namespace%%;*}")

    # Return
    echo "$complete_namespace"
}

# param1 (string): Full file path of the opened file.
# return (string): The class name as it exists in the opened (class) file.
get_class_name() {
    # Find the class name inside the opened file.
    local line_containing_class_name=$(grep -w '^class' "$1") # namespace PHP_Boilerplate\classes\subfolder;
    local class_name=${line_containing_class_name/class /}
    class_name=$(echo "${class_name%% *}")

    # Return
    echo "$class_name"
}

main() {

    clear

    # Receives the ${fileBasename} (filename with extension) from the VSCODE task.
    current_opened_file="$1"

    # Builds the full file path to the opened file.
    local file_relative_folder=$(get_file_relative_folder "$current_opened_file")
    local file_full_folder_path=$(realpath $file_relative_folder)
    local file_full_path="${file_full_folder_path}/${current_opened_file}"

    # Creates the full folder path for the test file that will be created.
    local tests_replacement="tests/src"
    local tests_full_folder_path=${file_full_folder_path/src/"$tests_replacement"}

    # Creates the path in the tests folder if necessary.
    if [ ! -d $tests_full_folder_path ]; then
        mkdir -p $tests_full_folder_path
    fi

    # Builds the namespace with the class name.
    local file_namespace=$(get_file_namespace "$file_full_path")
    local file_class_name=$(get_class_name "$file_full_path")
    local file_namespace_and_class_name="${file_namespace}\\${file_class_name}"

    # Builds the test's namespace.
    local test_namespace_sufix="${file_namespace_and_class_name}Test"

    # Builds the test's full path.
    local test_full_path="${tests_full_folder_path}/${current_opened_file}"
    test_full_path=${test_full_path/.php/Test.php}

    # When passing arguments to phpunit-skeleton-generator,
    # the Cygwin prefix /cygdrive/c must be removed.
    if [[ "$file_full_path" =~ ^\/cygdrive\/c ]]; then
        file_full_path=${file_full_path/\/cygdrive\/c/C\:}
    fi

    if [[ "$test_full_path" =~ ^\/cygdrive\/c ]]; then
        test_full_path=${test_full_path/\/cygdrive\/c/C\:}
    fi

    # Creates the test file.
    phpunit-skelgen.bat generate-test $file_namespace_and_class_name $file_full_path $test_namespace_sufix $test_full_path

    # Inserts the documentation into file.
    insert_phpdoc_file_documentation "$test_full_path"

    # Inserts the require_once statement.
    insert_require_once "$test_full_path"

    # Formats the test file.
    php-cs-fixer.bat fix "$test_full_path"
}

main "$1"