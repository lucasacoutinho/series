echo '----Rodando testes----'
clear
php artisan test tests/Feature/Auth
if [ $? -ne 0 ]
then
  exit 2
fi
