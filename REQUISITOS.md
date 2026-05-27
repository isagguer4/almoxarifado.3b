# requisitos funcionais
- [RF01] registrar os produtos do almoxarifado: o sistema deve permitir o cadastro de produtos novos (nome, quantidade, marca)
- [RF02] registrar entradas e saídas: o usúario deve conseguir registrar e visualizar as entradas e saídas dos produtos
- [RF03] registrar login: o sistema deve receber e armazenar as informações de login do usuário (email, senha, cpf, nome)

# requisitos não funcionais 
- [RNF01] experiência do usuário: O sistema deve corresponder bem aos comandos do usuário, como velocidade de carregamento e registros corretos 
- [RNF02] segurança: garantir que as informações dos usuários sejam armazenadas com segurança,e somente usuários autorizados devem conseguir modificar status 
- [RNF03] acessibilidade: o sistema deve estar adepto à diferentes necessidades dos usuários 

# regra de negócio
- [RN01] controle de dados e integridade:nenhum usuário pode ser cadastrado sem CPF válido, garantindo que informações sejam confiáveis
- [RN02] estoque e logística: regras que evitam falta de mercadoria ou estoque
- [RN03] processos de aprovação: pedidos acima da quantidade de estoque devem ser avaliados por superiores