<template>
    <div class="container-fluid" v-if="showPremiacao" >
        <h1>Premiações</h1>
      <el-table
        :data="tableData.filter(data => !search || data.name.toLowerCase().includes(search.toLowerCase()))"
        style="width: 100%"
      >
        <el-table-column label="Pontos Necessários" prop="pontos"></el-table-column>
        <el-table-column label="Parceiros" prop="parceiro"></el-table-column>
        <el-table-column label="Prêmio" prop="premio"></el-table-column>
        <el-table-column align="right">
          <template slot="header" slot-scope="scope">
            <el-input v-model="search" size="mini" placeholder="Procure por uma premiação" />
          </template>
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
</template>
<script>
import Swal from "sweetalert2";
export default {
    data (){
        return {
        premiacoes: [
        {
          pontos: 150,
          parceiro: "Livraria UFG",
          premio: "10% de desconto na Livraria UFG"
        },
        {
          pontos: 250,
          parceiro: "Sebrae",
          premio: "50% de desconto no curso de sua escolha"
        },
        {
          pontos: 300,
          parceiro: "Sebrae",
          premio: "80% de desconto no curso de sua escolha"
        },
        {
          pontos: 350,
          parceiro: "Sempreende",
          premio: "Vale Curso - Finanças Pessoais - dia 23/08"
        }
      ],
        }
    },
    methods (){
        trocarPontos(index, row) {
            console.log(index, row);
            if (this.perfil.score > row.pontos) {
                this.perfil.score = this.perfil.score - row.pontos;
                this.$swal("Pontos trocados com sucesso")
            } else {
                this.$swal("Você não tem pontos necessários");
            }
        }
    }
    
}
</script>
