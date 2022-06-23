# Interconnection des tables 

#### Les jointures 
- Il existe plusieur types de jointures: 
    1. Les jointures internes : Selectionnes les donnée qui ont une correspondance entre deux tables 
    2. Les jointures externes : Selectionnent toutes les données meme si certaines n'ont pas de correspondance dans l'autre table. 
    3. ...

#### Jointures internes 
- Une jointure interne s'effectue l'aide du mot clef **JOIN**
    - Liste des nom d'utilisateur et poste attribués 
        -   ```
                SELECT u.nom, p.post
                FROM Utilisateur u
                INNER JOIN Post p 
                ON u.user_id = p.post_id
            ```