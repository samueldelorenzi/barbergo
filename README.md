# BarberGO

### Estatísticas
![GitHub repo size](https://img.shields.io/github/repo-size/samueldelorenzi/barbergo?style=for-the-badge)
![GitHub language count](https://img.shields.io/github/languages/count/samueldelorenzi/barbergo?style=for-the-badge)
![Commits count](https://img.shields.io/github/commit-activity/t/samueldelorenzi/barbergo?style=for-the-badge)
![Last commit](https://img.shields.io/github/last-commit/samueldelorenzi/barbergo?style=for-the-badge)
![Contributors](https://img.shields.io/github/contributors/samueldelorenzi/barbergo?style=for-the-badge)

### Ferramentas
![PHP](https://img.shields.io/badge/PHP-000000?style=for-the-badge&logo=php&logoColor=white&logoSize=auto&color=787cb5)
![HTML5](https://img.shields.io/badge/HTML-000000?style=for-the-badge&logo=html5&logoColor=white&logoSize=auto&color=orange)
![CSS3](https://img.shields.io/badge/CSS-000000?style=for-the-badge&logo=css3&logoColor=white&logoSize=auto&color=blue)
![MySQL](https://img.shields.io/badge/MYSQL-blue?style=for-the-badge&logo=mysql&logoColor=white&logoSize=auto)

<img src="https://raw.githubusercontent.com/samueldelorenzi/barbergo/refs/heads/main/anexos/readme_image.png" alt="BarberGO">

> BarberGO é um projeto desenvolvido como trabalho final da disciplina de Programação II do curso de Ciência da Computação na UNOESC Videira. O sistema foi desenvolvido para gerenciar horários em barbearias, utilizando PHP, CSS e HTML em uma arquitetura MVC (Model-View-Controller), com um banco de dados MySQL para armazenamento das informações.

## 📋 Funcionalidades

- Gerenciamento de horários para barbearias.
- Cadastro e consulta de clientes.
- Histórico de agendamentos.
- Integração com banco de dados MySQL para persistência dos dados.

## 🛠️ Tecnologias Utilizadas

- **PHP**: Lógica de backend para o funcionamento da aplicação.
- **HTML e CSS**: Interface do usuário e estilização.
- **MVC (Model-View-Controller)**: Arquitetura utilizada para separar as responsabilidades do sistema.
- **MySQL**: Banco de dados para armazenar informações de clientes e agendamentos.

## 📅 Ajustes e Melhorias

O projeto está em desenvolvimento contínuo. Futuras atualizações incluirão:

- [ ] Envio de notificações de lembrete.
- [ ] Envio de e-mails de lembrete.

## 💻 Pré-requisitos

Antes de iniciar a instalação, certifique-se de que você atende aos seguintes requisitos:

- **PHP**: Versão mais recente instalada.
- **MySQL**: Configurado corretamente.
- **Servidor Web**: Apache ou outro que suporte PHP.
- **Sistema Operacional**: Compatível com **Windows**, **Linux** ou **macOS**.

## 🚀 Instalando BarberGO

### Passo 1: Clonar o repositório

Clone o repositório do projeto para a sua máquina local:

```bash
git clone https://github.com/samueldelorenzi/barbergo.git
```

### Passo 2:

Garanta que você possui o PHP baixado em seu computador.

```bash
php -v
```

## ☕ Usando BarberGO

Dentro da pasta sql está o arquivo ```barbergo_db.sql``` que é o arquivo de configuração do banco de dados da aplicação, basta criar o banco usando o MySQL Workbench ou similar e definir as conexões no arquivo ```banco.php``` dentro da pasta controllers:
```
$bdServidor = 'localhost';
$bdUsuario = 'root';
$bdSenha = 'root';
$bdBanco = 'barbergo';
```
Após configurado basta acessar o diretório onde se encontra o app BarberGO e acessar pelo localhost

## 🪒 Logo

A criação da logo foi inspirada na união de dois elementos essenciais para o conceito do projeto: o relógio, que simboliza a gestão de horários, e a navalha, representando a essência da barbearia.

<img src="https://raw.githubusercontent.com/samueldelorenzi/barbergo/refs/heads/main/anexos/barbergologo.jpg" alt="BarberGO logo" width="350px" height="350px">

## 🤝 Colaboradores

Agradecemos às seguintes pessoas que contribuíram para este projeto:

<table>
  <tr>
    <td align="center">
      <a href="https://www.linkedin.com/in/paulo-m%C3%A1rio-valente-bumba-126405260/" title="LinkedIn">
        <img src="https://media.licdn.com/dms/image/v2/D4D03AQHPdWjs4hdGMQ/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1719023331041?e=1733961600&v=beta&t=huCmoflYvNLFazSFDWY_aGZbhFjNM0OJaIaT-3x4C8Y" width="100px;" alt="Foto do Paulo"/><br>
        <sub>
          <b>Paulo Bumba</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="https://www.linkedin.com/in/samueldelorenzi/" title="LinkedIn">
        <img src="https://media.licdn.com/dms/image/v2/D4D03AQFdYE7vQTyqXA/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1720058448969?e=1733961600&v=beta&t=ccVL8BjRvxFrMiyfSQ3QXLb00gIk7OWkcdG2BSm7iuE" width="100px;" alt="Foto do Samuel"/><br>
        <sub>
          <b>Samuel De Lorenzi</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="https://www.linkedin.com/in/wesllen-felipe-langaro-raiser-da-cruz-31b9ab210/" title="LinkedIn">
        <img src="https://media.licdn.com/dms/image/v2/D4D03AQGOczBgQCBtSA/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1665170990118?e=1733961600&v=beta&t=ZGNdDzQgZ19OCEaK7UHcI8kFYdoBlPYAR1G6WYM6Nd0" width="100px;" alt="Foto do Wesllen"/><br>
        <sub>
          <b>Wesllen Langaro</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="https://www.linkedin.com/" title="LinkedIn">
        <img src="#" width="100px;" alt="Wilian foto"/><br>
        <sub>
          <b>Wilian</b>
        </sub>
      </a>
    </td>
  </tr>
</table>
