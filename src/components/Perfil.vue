 <template>
  <div>
    <img @click="changeShows('Perfil')" width="250" src="../assets/logo.png" />
    <div class="container-fluid" v-if="showPerfil">
      <br />
      <h1 style="text-align: center">Perfil de Usuário</h1>
      <el-avatar src="https://cube.elemecdn.com/0/88/03b0d39583f48206768a7534e55bcpng.png"></el-avatar>
      <h2>Nome: {{perfil.nome}}</h2>
      <h2>Score: {{perfil.score}}</h2>
      <h2>Horas de Eventos: {{perfil.horas}}</h2>
      <h2>Eventos: {{perfil.eventos_cadastrados}}</h2>

      <el-button type="primary" @click="changeShows('Eventos')" round>Buscar Eventos</el-button>
      <el-button type="warning" @click="changeShows('Premiacao')" icon="el-icon-star-off" circle></el-button>
    </div>
    <div class="container-fluid" v-if="showEventos">
      <div class="row">
        <el-row>
          <el-col :span="8" v-for="(o, index) in eventos" :key="o" :offset="index > 0 ? 2 : 0">
            <el-card :body-style="{ padding: '0px' }">
              <img :src="o.img" class="image" />
              <div style="padding: 14px;">
                <span>{{o.nome}}</span>
                <div class="bottom clearfix">
                  <time class="time">{{ currentDate }}</time>
                  <br />
                  <el-button @click="inscrever(index)" type="primary">Inscrever</el-button>
                  <br />
                  <el-button type="text" class="button">Saber Mais</el-button>
                </div>
              </div>
            </el-card>
          </el-col>
        </el-row>
      </div>
    </div>
    <br />
    <div class="container-fluid" v-if="showPremiacao">
      <h1>Premiações</h1>
      <el-table
        :data="tableData.filter(data => !search || data.name.toLowerCase().includes(search.toLowerCase()))"
        style="width: 100%"
      >
        <el-table-column label="Pontos Necessários" prop="pontos"></el-table-column>
        <el-table-column label="Parceiros" prop="parceiro"></el-table-column>
        <el-table-column label="Prêmio" prop="premio"></el-table-column>
        <el-table-column align="right">
          <template slot-scope="scope">
            <el-button
              size="mini"
              type="danger"
              @click="trocarPontos(scope.$index, scope.row)"
            >Trocar</el-button>
          </template>
        </el-table-column>
      </el-table>
    </div>
  </div>
</template>


<script>
var moment = require("moment");
moment.locale("pt-br");
import Swal from "sweetalert2";
export default {
  name: "Perfil",
  async created() {},
  data() {
    return {
      showPerfil: true,
      showPremiacao: false,
      showEventos: false,
      currentDate: moment().format("LLLL"),
      perfil: {
        nome: "Vitor",
        score: 0,
        horas: 0,
        eventos_cadastrados: 0
      },
      eventos: [
        {
          nome: "2 Hackthon UFG",
          img: "https://picsum.photos/600/300/?image=24",
          descricao: "Local do Evento: Centro de Aulas D, Público alvo: Alunos da UFG",
          horas: 24,
          pontos: 24
        },
        {
          nome: "Semináro de Políticas Públicas",
          img: "https://picsum.photos/600/300/?image=23",
          descricao: "Local do Evento: Faculdade de Direito, Público alvo: Alunos da UFG",
          horas: 10,
          pontos: 10
        },
        {
          nome: "Como falar em público",
          img: "https://picsum.photos/600/300/?image=25",
          descricao: "Local do Evento: Sempreende",
          horas: 4,
          pontos: 4
        },
        {
          nome: "Semana da Informática",
          img: "https://picsum.photos/600/300/?image=26",
          descricao: " Local do Evento: Instituto de Informática",
          horas: 100,
          pontos: 100
        }
      ],
      tableData: [
        {
          pontos: 250,
          parceiro: "Livraria UFG",
          premio: "10% de desconto na Livraria UFG"
        },
        {
          pontos: 350,
          parceiro: "Sebrae",
          premio: "50% de desconto no curso de sua escolha"
        },
        {
          pontos: 400,
          parceiro: "Sebrae",
          premio: "80% de desconto no curso de sua escolha"
        },
        {
          pontos: 500,
          parceiro: "Sempreende",
          premio: "Vale Curso - Finanças Pessoais - dia 23/08"
        }
      ],
      search: ""
    };
  },
  methods: {
    changeShows(show) {
      if (show == "Eventos") {
        this.showEventos = true;
        this.showPerfil = false;
      }
      if (show == "Premiacao") {
        this.showPremiacao = true;
        this.showPerfil = false;
      }
      if (show == "Perfil") {
        this.showPerfil = true;
        this.showPremiacao = false;
        this.showEventos = false;
      }
    },
    inscrever(posicao) {
      this.perfil.score = this.perfil.score + this.eventos[posicao].pontos;
      this.perfil.horas = this.perfil.horas + this.eventos[posicao].horas;
      this.perfil.eventos_cadastrados = this.perfil.eventos_cadastrados + 1;
      this.$swal("Inscrito com sucesso").then(result => {
        if (result) this.changeShows("Perfil");
      });
    },
    trocarPontos(index, row) {
      console.log(index, row);
      if (this.perfil.score > row.pontos) {
        this.perfil.score = this.perfil.score - row.pontos;
        this.$swal("Pontos trocados com sucesso, o vouncher foi enviado para seu email").then(result => {
          if (result) this.changeShows("Perfil");
        });
      } else {
        this.$swal("Você não tem pontos necessários");
      }
    }
  }
};
</script>

<style scoped>
.image {
  width: 100%;
  display: block;
}
label {
  font-weight: bold;
  font-size: medium;
}
</style>
