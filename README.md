Avant d'utiliser le Project, rassurer vous d'avoir installé Wamp, Composer, NodeJs et d'avoir des connaissances en Laravel et VueJs
Configuration Laravel
- Créer une base de données qui porte le nom chatcodex de type utf8mb4_general_ci
- Accéder au projet Laravel avec le CMD ou le terminal de votre éditeur de texte
- Taper la commande php artisan migrate
- Taper la commande php artisan passport:install
- Taper la commande php artisan db:seed (02 comptes utilisateur seront créé par défaut)
- Ouvrer 02 terminaux et lancer les commandes suivantes : php artisan serve --port=8000 --host=adresse_ip_de_votre_machine et php artisan websockets:serve

Configuration VueJs
- A l'aide de votre éditeur accéder au fichier src/store/store.js
- Remplacer les valeurs des variable host et api par votre adresse ip (host:'adresse_ip_de_votre_machine ', api:'adresse_ip_de_votre_machine/api/')
- Ouvrer le terminal et taper la commande npm run serve

Bravo vous êtes prêt à utiliser le projet, connecter vous avec les identifiants suivant ou créer votre propre compte:
Email: dilan@gmail.com
mdp: 123456789

Ou

Email: lawal@gmail.com
mdp: 123456789

NB: Pour tester le projet en local, installer google chrome sur les appareils qui vont accéder au projet, 
puis entrer dans la barre de recherche de google chrome (chrome://flags/#unsafely-treat-insecure-origin-as-secure). 
Dans la page qui apparait rechercher Insecure origins treated as secure et activer le, ensuite entrer dans sa zone
de texte http://adresse_ip_de_votre_machine et enregistrer.

