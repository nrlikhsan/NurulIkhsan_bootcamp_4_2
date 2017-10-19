import { Injectable } from '@angular/core';

@Injectable()
export class DataService {

  id:number;
  name:string = "";

  constructor() { }
  public courseList: object[] = [
    {'id' : '1', 'name' : 'kuliah 1'},
    {'id' : '2', 'name' : 'kuliah 2'},
    {'id' : '3', 'name' : 'kuliah 3'},
    {'id' : '4', 'name' : 'kuliah 4'},
    {'id' : '5', 'name' : 'kuliah 5'},
  ]

  AddCourse(){
    this.courseList.push({
      "id" : this.id,
      "name" : this.name
    });
  }
}
