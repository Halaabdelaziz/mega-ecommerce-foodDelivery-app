curl --location --request POST '/register' \
--form 'name="omar"' \
--form 'email="omar@gmail.com"' \
--form 'password="12345678"' \
--form 'password confirmation="12345678"'


curl --location --request POST '/login' \
--form 'email="omar@gmail.com"' \
--form 'password="12345678"'


curl --location --request GET '/logout' \
--header 'Accept: application/json'


curl --location --request GET '/restarunt/list'


