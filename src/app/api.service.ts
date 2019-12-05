import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Game } from './game';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  PHP_API_SERVER = "http://127.0.0.1";

  constructor(private HttpClient: HttpClient) {}

  readGames(): Observable<Game[]>{
    return this.HttpClient.get<Game[]>('${this.PHP_API_SERVER}/api/read.php');
  }

  createGame(game: Game): Observable<Game>{
    return this.HttpClient.post<Game>('${this.PHP_API_SERVER}/api/create.php', game);
  }

  updateGame(game: Game){
    return this.HttpClient.put<Game>('${this.PHP_API_SERVER}/api/update.php', game);
  }

  deleteGame(id: number){
    return this.HttpClient.delete<Game>('${this.PHP_API_SERVER}/api/delete.php/?id=${id}');
  }
}
