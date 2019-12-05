import { Game } from './../game';
import { ApiService } from './../api.service';
import { Component, OnInit } from '@angular/core';


@Component({
  selector: 'app-livros',
  templateUrl: './livros.component.html',
  styleUrls: ['./livros.component.css']
})
export class LivrosComponent implements OnInit {

  games: Game[];
  selectGame: Game = {id: null, nome: null, descricao: null, preco: null, categoria_id: null, plataforma_id: null};

  constructor(private apiService: ApiService) { }

  ngOnInit() {
    this.apiService.readGames().subscribe((games: Game[])=>{
      this.games = games;
      console.log(this.games);
    })
  }

}
