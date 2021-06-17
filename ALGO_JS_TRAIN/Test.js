function number(n){
    for(let i=1; i<=n; i++){
        let x= '';
        for(let j=1; j>=i ; j--){
            x-=j;
            
        }
        console.log(x)
    }
}

number(3)