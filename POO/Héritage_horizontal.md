# Héritages avec les traits

1. #### Le probleme du diameant:
    - le probleme du diamant est le probleme qui survient lorsqu'on a deux classes **B** et **C** qui héritent d'une  classe **A** et qu'une classe **D** hérite à la fois des classes **B et C** 
        - ***En PHP, il n'est pas possible d'hériter de deux classes au plus.***
            - On utilise des **traits** plutot qu'un héritage multiple.

2. #### Les traits
    - Les **traits** c'est comme une classe sauf que au lieu d'utiliser le mot clé **class** on utilise le mot clé **trait**
        - Ils possedent: 
            1. Un nom
            2. Des propriétés
            3. Des méthodes
            4. propose l'abstraction et la staticité
        - Il peut modier la visibilité d'une méthode ou d'une propriété, créer des **Alias** de méthodes ou des propriétés en cas de conflits et etre composer de plusieurs autres traits
    - **Un trait ne peut pas etre instancier**
    - Une classe peut etre composer de plusieurs traits car un trait peut etre potentiellement utiliser par plusieurs arbres généalogique d'héritage.
    - ***Un bon cas d'usage, c'est lorsque vous souhaitez offrir des fonctionnalités qui pourraient ne pas être associées à un domaine en particulier. Si l'on reprend nos exemples des messages du chapitre précédent, on pourrait imaginer que les 2 possèdent des éléments communs. Pour autant, ce ne serait pas logique qu'ils aient un ancêtre en commun. Ils n'appartiennent pas au même domaine, cela rendrait le couplage trop important. Les traits sont une solution***
        -   ```
                <?php
                    declare(strict_types=1);

                    namespace Domain\Mixins {
                    // ce trait fourni le nécessaire pour gérer du contenu 
                    trait ContentAware {
                        protected string $content;
                        
                        public function getContent() {
                            return $this->content;
                        }   
                        
                        public function setContent(string $content) {
                            $this->content = $content;
                        }
                    }
                    
                    use Domain\user\User;
                    
                    // ce trait fourni le nécessaire pour gérer un auteur
                    trait UserAware {
                        protected User $author;
                        
                        public function getAuthor() {
                            return $this->author;
                        }   
                        
                        public function setAuthor(User $author) {
                            $this->author = $author;
                        }
                    }
                    }


                    namespace Domain\User {
                    class User {
                        public function __construct(public string $name){}
                    }
                    }


                    namespace Domain\Forum {
                    use Domain\Mixins;

                    // A présent nous avons une classe Message utilisant ces 2 traits
                    // En créant plus tard une seconde classe Message mais appartenant au domaine des notifications par exemple, celle ci pourra utiliser également les traits :)
                    class Message {
                        use Mixins\ContentAware, Mixins\UserAware;
                    }
                    }
                    
                    namespace {
                    use Domain\Forum\Message;
                    use Domain\User\User;
                    
                    $message = new Message;
                    $message->setContent('Hello');
                    $message->setAuthor(new User('greg'));
                    
                    echo sprintf('%s %s', $message->getContent(), $message->getAuthor()->name);

                    }
            ```