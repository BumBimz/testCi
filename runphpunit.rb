watch ('.*\.php$') {|phpFile| run_php_unit(phpFile)} 

def run_php_unit(modified_file)
    system('cls')
    system("phpunit -c phpunit.xml")
end
