import { CadastroComponent } from './cadastro/cadastro.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LivrosComponent } from './livros/livros.component';
import { GameComponent } from './game/game.component';

const routes: Routes = [
  { path: 'livros', component: LivrosComponent },
  { path: 'cadastro', component: CadastroComponent },
  { path: 'game', component: GameComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
